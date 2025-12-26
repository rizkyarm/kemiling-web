const DEFAULT_CENTER = { lat: -5.399694587905413, lng: 105.20803546610303 };
const DEFAULT_ZOOM   = 12;

function numOrNull(v){ const n = parseFloat(v); return Number.isFinite(n) ? n : null; }

let mapsLoadingPromise = null;

function loadGoogleMapsIfNeeded() {
  if (window.google && window.google.maps && window.google.maps.places) {
    return Promise.resolve();
  }
  if (mapsLoadingPromise) return mapsLoadingPromise;

  const meta = document.querySelector('meta[name="gmaps-api-key"]');
  const apiKey = meta?.getAttribute('content');
  if (!apiKey) {
    console.error('[Maps] API key not found in <meta name="gmaps-api-key">');
    return Promise.reject(new Error('Missing Google Maps API key'));
  }

  mapsLoadingPromise = new Promise((resolve, reject) => {
    const existing = document.querySelector('script[data-gmaps="1"]');
    if (existing) {
      existing.addEventListener('load', resolve, { once: true });
      existing.addEventListener('error', reject, { once: true });
      return;
    }

    const s = document.createElement('script');
    s.src = `https://maps.googleapis.com/maps/api/js?key=${encodeURIComponent(apiKey)}&libraries=places`;
    s.async = true;
    s.defer = true;
    s.dataset.gmaps = "1";
    s.onload = () => resolve();
    s.onerror = (e) => reject(e);
    document.head.appendChild(s);
  });

  return mapsLoadingPromise;
}

export function initProductLocationMap() {
  const mapEl   = document.getElementById("map");
  const inputEl = document.getElementById("place_search");
  const latEl   = document.getElementById("latitude");
  const lngEl   = document.getElementById("longitude");
  if (!mapEl || !inputEl || !latEl || !lngEl) return;

  const oldLat = numOrNull(mapEl.dataset.oldLat);
  const oldLng = numOrNull(mapEl.dataset.oldLng);
  const hasOld = oldLat !== null && oldLng !== null;

  const map = new google.maps.Map(mapEl, {
    center: hasOld ? { lat: oldLat, lng: oldLng } : DEFAULT_CENTER,
    zoom: hasOld ? 15 : DEFAULT_ZOOM,
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: true,
  });

  let marker = null;
  const setInputs = (ll)=>{ latEl.value = ll.lat().toFixed(7); lngEl.value = ll.lng().toFixed(7); };
  const placeMarker = (ll)=>{
    if(!marker){
      marker = new google.maps.Marker({ position: ll, map, draggable: true, animation: google.maps.Animation.DROP });
      marker.addListener("dragend", () => setInputs(marker.getPosition()));
    } else {
      marker.setPosition(ll);
    }
    setInputs(marker.getPosition());
  };

  if (hasOld) placeMarker(new google.maps.LatLng(oldLat, oldLng));

  map.addListener("click", (e)=> placeMarker(e.latLng));

  const opts = { fields: ["geometry","name","formatted_address"] };
  const country = mapEl.dataset.country;
  if (country) opts.componentRestrictions = { country: [country] };

  const ac = new google.maps.places.Autocomplete(inputEl, opts);
  ac.addListener("place_changed", ()=>{
    const place = ac.getPlace();
    if (!place.geometry || !place.geometry.location) return;
    const loc = place.geometry.location;
    map.panTo(loc);
    map.setZoom(16);
    placeMarker(loc);
  });

  const tryFromInputs = ()=>{
    const lat = numOrNull(latEl.value), lng = numOrNull(lngEl.value);
    if (lat===null || lng===null) return;
    const pos = new google.maps.LatLng(lat, lng);
    placeMarker(pos); map.panTo(pos);
  };
  latEl.addEventListener("change", tryFromInputs);
  lngEl.addEventListener("change", tryFromInputs);

  window.__productMap = map;
}

function boot() {
  if (!document.getElementById("map")) return;
  loadGoogleMapsIfNeeded()
    .then(() => {
      initProductLocationMap();
      console.log('[Maps] Loaded & initialized');
    })
    .catch((e) => {
      console.error('[Maps] Failed to load:', e);
    });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', boot, { once: true });
} else {
  boot();
}