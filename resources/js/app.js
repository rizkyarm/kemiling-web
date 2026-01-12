import './bootstrap';

import Alpine from 'alpinejs';

import './maps-location.js'

window.previewSingleImage = function (event, previewId) {
  const input = event?.target;
  const preview = document.getElementById(previewId);
  if (!input || !preview) return;

  const file = input.files?.[0];
  if (!file) return;

  if (!file.type.startsWith('image/')) return;

  const url = URL.createObjectURL(file);
  preview.src = url;

  preview.onload = () => URL.revokeObjectURL(url);
};


window.Alpine = Alpine;

Alpine.start();
