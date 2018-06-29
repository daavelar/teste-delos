<template>
    <div>
        <input placeholder="Nota fiscal" type="text" v-model="novo.nota_fiscal">
        <input placeholder="Valor" type="text" v-model="novo.valor">
        <input placeholder="Descrição" type="text" v-model="novo.descricao">
        <input placeholder="Observação" type="text" v-model="novo.observacao">
        <button class="btn btn-sm btn-success" @click="adicionar()">Adicionar Despesa</button>
        <table class="table table-bordered">
            <tr>
                <th>Nota fiscal</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Observação</th>
                <th>Ações</th>
            </tr>
            <tr v-for="despesa in despesas">
                <td>{{ despesa.nota_fiscal }}</td>
                <td>{{ despesa.valor }}</td>
                <td>{{ despesa.descricao }}</td>
                <td>{{ despesa.observacao }}</td>
                <td>
                    <button @click="abrirModalEditar(despesa)" class="btn btn-primary btn-sm">
                        Editar
                    </button>
                    <button @click="excluir(despesa)" class="btn btn-danger btn-sm">Excluir</button>
                </td>
            </tr>
        </table>

        <b-modal @ok="editar()" ref="modalEditarDespesa" title="Editar despesa">
            <input placeholder="Nota fiscal" type="text" v-model="edicao.nota_fiscal"><br>
            <input placeholder="Valor" type="text" v-model="edicao.valor"><br>
            <input placeholder="Descrição" type="text" v-model="edicao.descricao"><br>
            <input placeholder="Observação" type="text" v-model="edicao.observacao"><br>
        </b-modal>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.obterDespesas();
        },
        data() {
            return {
                edicao: {
                    nota_fiscal: '',
                    valor: '',
                    descricao: '',
                    observacao: '',
                    id: ''
                },
                novo: {
                    nota_fiscal: '',
                    valor: '',
                    descricao: '',
                    observacao: '',
                },
                despesas: []
            }
        },
        methods: {
            obterDespesas() {
                axios.get('/api/despesas').then(response => {
                    this.despesas = response.data;
                });
            },
            adicionar() {
                axios.post('/api/despesas', {
                    nota_fiscal: this.novo.nota_fiscal,
                    valor: this.novo.valor,
                    descricao: this.novo.descricao,
                    observacao: this.novo.observacao,
                }).then(response => this.obterDespesas());
            },
            abrirModalEditar(despesa) {
                this.edicao.nota_fiscal = despesa.nota_fiscal;
                this.edicao.valor = despesa.valor;
                this.edicao.descricao = despesa.descricao;
                this.edicao.observacao = despesa.observacao;
                this.edicao.id = despesa.id;

                this.$refs.modalEditarDespesa.show();
            },
            editar() {
                axios.put('/api/despesas/' + this.edicao.id, {
                    nota_fiscal: this.edicao.nota_fiscal,
                    valor: this.edicao.valor,
                    descricao: this.edicao.descricao,
                    observacao: this.edicao.observacao,
                }).then(response => this.obterDespesas());
            },
            excluir(despesa) {
                axios.delete('/api/despesas/' + despesa.id)
                    .then(response => this.obterDespesas());

            }
        }
    }
</script>
