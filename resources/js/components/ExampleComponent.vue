<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test Component</div>

                    <div class="card-body">
                        {{ name }}
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
                name: 'Pradip',
            }
        },
        mounted() {
            axios.get('/notifications').then(response => {
                this.name = response.data
            })
        }
    }
</script>
