import './bootstrap';
import 'flowbite';
import mask from '@alpinejs/mask';
import Alpine from 'alpinejs';
import axios from 'axios';

import CreateBoard from './board/create_board.js';
import KanbanBoard from './board/kanban_board.js';
import EditCard from './board/edit_card.js';
import Client from './client/client.js';
import ClientMenus from './client/dashboard/client_categories/client_menus.js';
import ClientPhones from './client/dashboard/client_categories/client_phones.js';
import ClientFiles from './client/dashboard/client_files/client_files.js';
import Collaborator from './collaborator/collaborator.js';
import CollaboratorInformation from './collaborator/dashboard/collaborator_information/collaborator_information.js';
import CollaboratorAddress from './collaborator/dashboard/collaborator_information/collaborator_address.js';
import Paper from './paper/paper.js';
import Company from './company/company.js';

Alpine.data('create_board', CreateBoard);
Alpine.data('kanban_board', KanbanBoard);
Alpine.data('edit_card', EditCard);
Alpine.data('client', Client);
Alpine.data('client_menus', ClientMenus);
Alpine.data('client_phones', ClientPhones);
Alpine.data('client_files', ClientFiles);
Alpine.data('collaborator', Collaborator);
Alpine.data('collaborator_information', CollaboratorInformation);
Alpine.data('collaborator_address', CollaboratorAddress);
Alpine.data('paper', Paper);
Alpine.data('company', Company);

window.Alpine = Alpine;
window.axios = axios;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#__token').getAttribute('content');
axios.defaults.baseURL = import.meta.env.VITE_APP_URL;
//axios.defaults.timeout = 10000;

Alpine.plugin(mask);

Alpine.start();
