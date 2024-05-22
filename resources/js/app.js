import './bootstrap';
import 'flowbite';

const tabsElement = document.getElementById('tabs');

// create an array of objects with the id, trigger element (eg. button), and the content element
const tabElements = [
    {
        id: 'description',
        triggerEl: document.querySelector('#description-btn'),
        targetEl: document.querySelector('#description-content'),
    },
    {
        id: 'info',
        triggerEl: document.querySelector('#info-btn'),
        targetEl: document.querySelector('#info-content'),
    },
];

// options with default values
const options = {
    defaultTabId: 'description',
    activeClasses:
        'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    inactiveClasses:
        'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {
        console.log('tab is shown');
    },
};

// instance options with default values
const instanceOptions = {
    id: 'tabs-example',
    override: true
};

import { Tabs } from 'flowbite';

/*
* tabsElement: parent element of the tabs component (required)
* tabElements: array of tab objects (required)
* options (optional)
* instanceOptions (optional)
*/
const tabs = new Tabs(tabsElement, tabElements, options, instanceOptions);

