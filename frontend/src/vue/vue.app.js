import Vue from 'vue';
import singleSpaVue from 'single-spa-vue';
import Hello from './main.vue';
import { 
  BNavbar, BNavbarBrand, BNavbarToggle,
  BNavbarNav, BCollapse, BNavItem,
  BNavForm, BFormInput, BButton,
  BNavItemDropdown, BDropdownItem, BToast,
  BProgress, BProgressBar, BJumbotron, 
  BContainer, BootstrapVueIcons, BModal, BCard, BForm, BFormGroup, BInputGroup, BCardText, BCol, BRow
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
Vue.component('b-progress', BProgress);
Vue.component('b-progress-bar', BProgressBar);
Vue.component('b-jumbotron', BJumbotron);
Vue.component('b-container', BContainer);
Vue.component('b-modal', BModal);
Vue.component('b-card', BCard);
Vue.component('b-form', BForm);
Vue.component('b-form-group', BFormGroup);
Vue.component('b-input-group', BInputGroup);
Vue.component('b-card-text', BCardText);
Vue.component('b-col', BCol);
Vue.component('b-row', BRow);
Vue.use(BootstrapVueIcons)



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