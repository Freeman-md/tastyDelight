<template>
  <div class="fixed items-center hidden md:flex -right-20 -bottom-20" :class="classes">
    <img class="object-contain object-center -mr-10 h-96 w-96" :src="$page.props.images.characters.boy" alt="Boy's Character" />
    <img class="object-contain object-center -ml-40 h-96 w-96" :src="$page.props.images.characters.girl" alt="Girl's Character" />
  </div>
</template>

<script>
export default {
  props: {
    classes: {
      type: String,
      default: 'md:right-0'
    }
  }
}
</script>