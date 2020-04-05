<template>
<div>
    <p>クジの数</p>
    <p>{{ count }}</p>
</div>
</template>

<script>
export default {
    props: {
        uname: String
    },
    data: function () {
        return {
            count: 0
        }
    },
    created: function () {
        this.setLotscount();
    },
    methods: {
        setLotsCount: function () {
            axios.get('/api/lot/' + this.uname + '/count')
                .then(res => {
                    this.count = res.data.count
                });
        }
    }

}
</script>
