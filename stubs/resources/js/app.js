import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
Alpine.plugin(Clipboard)

Livewire.start()

import 'flatpickr';

import * as FilePond from 'filepond';
window.FilePond = FilePond;
