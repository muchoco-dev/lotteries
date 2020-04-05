<template>
<div>
    <p>クジの数</p>
    <p>{{ count }}</p>

    <form>
        <p>{{ error }}</p>
        <input type="text" name="title" v-model="title">
        <button class="btn btn-default" v-on:click="add()">追加</button>
    </form>
</div>
</template>

<script>
export default {
    props: {
        uname: String
    },
    data: function () {
        return {
            count: 0,
            title: '',
            error: ''
        }
    },
    created: function () {
        this.setLotsCount();
    },
    methods: {
        setLotsCount: function () {
            axios.get('/api/lot/' + this.uname + '/count')
                .then(res => {
                    this.count = res.data.count
                });
        },
        add: function () {
            this.error = '';

            axios.post('/api/lot/' + this.uname + '/add', {
                title: this.title
            })
                .then(res => {
                    if (res.data.result === true) {
                        this.setLotsCount();
                    }
                })
                .catch(error => {
                    for (var key in error.response.data) {
                        this.error = error.response.data[key][0];
                    }
                })
        }
    }

}
</script>
