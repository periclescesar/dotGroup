Vue.component('gerenciador-tarefas', {
    template: `
        <div class="container">
            <b-navbar toggleable="md" type="dark" variant="info">
                <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
                <b-navbar-brand class='text-center' href="#">Gerenciador de Tarefas</b-navbar-brand>
                <b-collapse is-nav id="nav_collapse">
                    <b-navbar-nav>
                        <b-nav-item href="#">Adicionar</b-nav-item>
                    </b-navbar-nav>
                    <b-navbar-nav class="ml-auto">
                        <b-nav-form class='d-none'>
                            <b-form-input size="sm" class="mr-sm-2" type="text" placeholder="Search"/>
                            <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                        </b-nav-form>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>

            <div class="tarefas-container">
                <tarefa v-for="tarefa in tarefas" :tarefa="tarefa.Tarefa" :key="tarefa.Tarefa.id"/>
            </div>
        </div>`,
    data() {
        return {
            tarefas: []
        }
    },
    mounted() {
        axios
            .get('http://localhost/cakephp/tarefas.json')
            .then(response => (this.tarefas = response.data.tarefas));
    },
    methods: {}
});