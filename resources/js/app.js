import './bootstrap';
import './dark';
import 'flatpickr';
import "flatpickr/dist/flatpickr.css";
import ui from '@alpinejs/ui';

import * as FilePond from 'filepond';
window.FilePond = FilePond;

Alpine.plugin(ui);

