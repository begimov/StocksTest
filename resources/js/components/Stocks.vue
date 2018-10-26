<template>
    <div class="container my-5">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <div class="row">
                            <div class="col lead">
                                Список валют
                            </div>
                            <div class="col text-right">
                                <a href="#" class="btn btn-light btn-sm" @click.prevent="getStocks">Обновить</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Название</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Количество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(stock, key) in stocks" :key="key">
                                    <td>{{ stock.name }}</td>
                                    <td>{{ stock.price }}</td>
                                    <td>{{ stock.quantity }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                stocks: [],
                isLoading: false
            }
        },
        methods: {
            getStocks() {

                this.isLoading = true

                axios.get('/api/stocks').then(res => {

                    this.stocks = res.data

                    this.isLoading = false

                }).catch(err => {
                    //
                })
            }
        },
        mounted() {
            this.getStocks()
        }
    }
</script>
