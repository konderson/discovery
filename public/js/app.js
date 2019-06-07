Vue.filter('readMore', function (text) {
    suffix='...';
    length=80;
    return text.substring(0, length) + suffix;
});
Vue.filter('getImg', function (text) {
    var json_img=JSON.parse(text);
    response=json_img[0];
    return '/img/new/'+response;
});
Vue.filter('pathPublish', function (text) {
    return '/publish/detal/'+text;
});
new Vue({
    el: '#app',
    data: {
        publish: [],
        loading: false,
        error: false,
        query: null,
        category:true,



    },

    methods: {
        search: function() {
            // Очистим сообщение об ошибке.
            this.error = '';
this.category=false;
            // Опустошим набор данных.
            this.products = [];
            // Установим признак загрузки данных в true,
            // для отображения процесса поиска "Searching...".
            this.loading = true;

            // делаем get запрос к нашему API и передаем в него поисковый запрос.
            /*this.$http.get('/api/search?q=' + this.query).then((response) => {
                // Елси ошибки нет, заполняем массив products, в случае ошибки заполняем ее
                response.body.error ? this.error = response.body.error : this.products = response.body;
            // Запрос завершен. Меняем статус загрузки*/

            this.loading = false;
            // Очищаем поисковое слово.
var vm=this
            console.log("s")
            axios.get('/search?q='+this.query).then(function (response) {



               Vue.set(vm.$data,'error',response.data.error)
               Vue.set(vm.$data,'publish',response.data)


            })


        }

}
});