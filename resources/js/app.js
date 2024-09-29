import './bootstrap';
import 'flowbite';
import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';

import KanbanBoard from './kanban_board.js'

Alpine.data('kanban_board', KanbanBoard);

window.Alpine = Alpine;

Alpine.plugin(mask);

Alpine.start();
