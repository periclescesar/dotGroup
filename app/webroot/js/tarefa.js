Vue.component('tarefa', {
    template: `
    <div class="row">
    <div class="col-12">{{tarefa.titulo}}</div>
        
    </div>`,
    props: ['tarefa']
});