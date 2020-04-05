<template>
<div>
    <input type="text" v-model="url" id="url" readonly>
    <button class="clip" data-clipboard-target="#url">コピー</button>
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
