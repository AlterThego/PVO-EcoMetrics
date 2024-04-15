import './bootstrap';


import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'
Alpine.plugin(focus)


window.Alpine = Alpine;

// Alpine.start();

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

// If you use Tailwind 
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'

import 'flowbite';

import jQuery from 'jquery';
window.$ = jQuery;


