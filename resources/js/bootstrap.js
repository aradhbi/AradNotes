import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import $ from 'jquery';
window.$ = window.jQuery = $;

import select2 from 'select2';
select2($);   // <--- مهم!
import 'select2/dist/css/select2.min.css';

$(document).ready(() => {
  $('#skills').select2({
    placeholder: 'مهارت‌ها را انتخاب کنید',
    tags: true,
    dir: 'rtl'
  });
});
$(document).ready(() => {
  $('#interests').select2({
    placeholder: 'مهارت‌ها را انتخاب کنید',
    tags: true,
    dir: 'rtl'
  });
});
