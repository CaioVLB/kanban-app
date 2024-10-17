export default () => ({
  current_menu: {
    id: 'client_record',
    label: 'Ficha do Cliente'
  },
  current_submenu: {
    id: null,
    label: null
  },
  submenus: [
    { id: 'anamnese', label: 'Anamnese' },
    { id: 'fisioterapia', label: 'Fisioterapia' },
    { id: 'neuro', label: 'Neuro' },
    { id: 'ortopedia', label: 'Ortopedia' },
    { id: 'respiratoria', label: 'Respiratória' },
  ],
  active_menu: 'bg-amber-200 border rounded-lg border-amber-300 font-bold text-amber-600 shadow focus:outline-none hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700',
  inactive_menu: 'bg-white border rounded-lg border-gray-200 shadow hover:text-gray-900 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white',
  active_submenu: 'bg-amber-200 text-amber-600 shadow dark:text-amber-200 hover:text-amber-700 dark:hover:text-white hover:bg-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 rounded-md transition duration-150 ease-in-out',
  inactive_submenu: 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out',

  setCurrentMenu(menu) {
    this.current_menu = menu;
    this.current_submenu = {
      id: null,
      label: null
    };
  },

  setCurrentSubmenu(submenu) {
    this.current_submenu = submenu;
    this.current_menu = {
      id: null,
      label: null
    };
  },
});
