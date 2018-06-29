<template>
    <div>
        <input placeholder="Nota fiscal" type="text" v-model="novo.nota_fiscal">
        <input placeholder="Valor" type="text" v-model="novo.valor">
        <input placeholder="Descrição" type="text" v-model="novo.descricao">
        <input placeholder="Observação" type="text" v-model="novo.observacao">
        <button class="btn btn-sm btn-success" @click="adicionar()">Adicionar Despesa</button>
        <table class="table" v-if="despesas.count > 0">
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
                    <button @click="editar(despesa)" class="btn btn-primary btn-sm">Editar</button>
                    <button @click="excluir(despesa)" class="btn btn-primary btn-sm">Excluir</button>
                </td>
            </tr>
        </table>
        <div class="alert alert-info" v-else>
            Nenhuma despesa foi cadastrada até o momento
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
            adicionar() {
                axios.post('/api/despesas', {
                    params: {
                        nota_fiscal: novo.nota_fiscal,
                        valor: novo.valor,
                        descricao: novo.descricao,
                        observacao: novo.observacao,
                    }
                });
            },
            editar(despesa) {
            },
            excluir(despesa) {

            }
        }
    }
</script>
