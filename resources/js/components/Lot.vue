<template>
<div class="mt-3">
    <p class="mb-0">クジの数</p>
    <b>{{ count }}</b>

    <form>
        <div class="form-group row">
            <div class="col-10 col-lg-3 mx-auto">
                <p>{{ error }}</p>
                <input type="text" class="form-control" placeholder="大吉" name="title" v-model="title" maxlength="255" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-lg-3 mx-auto">
                <button class="btn btn-primary w-100" v-on:click="add()">追加</button>
            </div>
        </div>
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
