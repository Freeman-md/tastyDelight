<template>
    <div class="w-screen h-screen bg-center bg-cover" :class="[$page.url === '/' ? 'bg-complex' : 'bg-simple']">
        <Header v-show="$page.props.auth.user" />

        <slot />

        <Characters classes="right-10" v-show="$page.url === '/'" />
    </div>
</template>

<script>
import Header from '@/Shared/Header.vue'
import Characters from '@/Components/Characters.vue'
export default {
    components: {
        Header,
        Characters
    }
}
</script>
