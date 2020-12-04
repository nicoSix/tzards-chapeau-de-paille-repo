import Vue from 'vue';
import singleSpaVue from 'single-spa-vue';
import Hello from './main.vue';
import { 
  BNavbar, BNavbarBrand, BNavbarToggle,
  BNavbarNav, BCollapse, BNavItem,
  BNavForm, BFormInput, BButton,
  BNavItemDropdown, BDropdownItem, BToast
} from 'bootstrap-vue';
Vue.component('b-navbar', BNavbar);
Vue.component('b-navbar-brand', BNavbarBrand);
Vue.component('b-navbar-toggle', BNavbarToggle);
Vue.component('b-collapse', BCollapse);
Vue.component('b-navbar-nav', BNavbarNav);
Vue.component('b-nav-item', BNavItem);
Vue.component('b-nav-form', BNavForm);
Vue.component('b-form-input', BFormInput);
Vue.component('b-button', BButton);
Vue.component('b-toast', BToast);
Vue.component('b-nav-item-dropdown', BNavItemDropdown);
Vue.component('b-dropdown-item', BDropdownItem);




const vueLifecycles = singleSpaVue({
  Vue,
  appOptions: {
    el: '#vue',
    render: r => r(Hello)
  } 
});

export const bootstrap = [
  vueLifecycles.bootstrap,
];

export const mount = [
  vueLifecycles.mount,
];

export const unmount = [
  vueLifecycles.unmount,
];