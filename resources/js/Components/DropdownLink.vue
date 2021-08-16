<template>
    <Link class="block w-full px-2 py-1 text-xs font-bold leading-5 text-center text-gray-700 transition duration-150 ease-in-out sm:text-sm sm:px-4 sm:py-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
