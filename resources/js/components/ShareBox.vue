<template>
<div class="mx-auto">
    <form class="form-inline">
        <div class="form-group mb-0">
            <input type="text" v-model="url" id="url" class="form-control" readonly>
        </div>
        <button class="btn btn-outline-primary clip" data-clipboard-target="#url">コピー</button>
    </form>
</div>
</template>

<script>
import clipboard from 'clipboard';
export default {
    props: {
        url: String
    },
    data() {
        return {
            clipBoard: null
        }
    },
    mounted() {
        this.clipBoard = new clipboard('.clip');
        this.clipBoard.on('success', function (e) {
            alert('クリップボードにコピーしました');

            e.clearSelection();
        })
    }
}
</script>
