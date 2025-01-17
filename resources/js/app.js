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
import ClientDetails from './client/dashboard/client_categories/client_details.js';
import ClientAddresses from './client/dashboard/client_categories/client_addresses.js';
import ClientPhones from './client/dashboard/client_categories/client_phones.js';
import ClientFiles from './client/dashboard/client_files/client_files.js';

import Collaborator from './collaborator/collaborator.js';
import CollaboratorMenus from './collaborator/dashboard/collaborator_categories/collaborator_menus.js';
import CollaboratorDetails from './collaborator/dashboard/collaborator_categories/collaborator_details.js';
import CollaboratorAddresses from './collaborator/dashboard/collaborator_categories/collaborator_addresses.js';
import CollaboratorPhones from './collaborator/dashboard/collaborator_categories/collaborator_phones.js';
import CollaboratorAccess from "./collaborator/dashboard/collaborator_categories/collaborator_access.js";
import CollaboratorFiles from './collaborator/dashboard/collaborator_files/collaborator_files.js';

import Paper from './paper/paper.js';
import Category from './category/category.js';
import Service from './service/service.js';
import Company from './company/company.js';

Alpine.data('create_board', CreateBoard);
Alpine.data('kanban_board', KanbanBoard);
Alpine.data('edit_card', EditCard);

Alpine.data('client', Client);
Alpine.data('client_menus', ClientMenus);
Alpine.data('client_details', ClientDetails);
Alpine.data('client_addresses', ClientAddresses);
Alpine.data('client_phones', ClientPhones);
Alpine.data('client_files', ClientFiles);

Alpine.data('collaborator', Collaborator);
Alpine.data('collaborator_menus', CollaboratorMenus);
Alpine.data('collaborator_details', CollaboratorDetails);
Alpine.data('collaborator_addresses', CollaboratorAddresses);
Alpine.data('collaborator_phones', CollaboratorPhones);
Alpine.data('collaborator_access', CollaboratorAccess);
Alpine.data('collaborator_files', CollaboratorFiles);

Alpine.data('paper', Paper);
Alpine.data('category', Category);
Alpine.data('service', Service);
Alpine.data('company', Company);

window.Alpine = Alpine;
window.axios = axios;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#__token').getAttribute('content');
axios.defaults.baseURL = import.meta.env.VITE_APP_URL;
//axios.defaults.timeout = 10000;

Alpine.plugin(mask);

Alpine.start();
