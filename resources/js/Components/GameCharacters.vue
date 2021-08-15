<template>
  <div class="fixed flex items-center" :class="classes">
    <img class="object-contain object-center mb-8 -mr-52 h-96 w-96" :src="$page.props.images.characters.girl" alt="Girl's Character" />
    <img class="object-contain object-center h-96 w-96" :src="$page.props.images.characters.boy" alt="Boy's Character" />
  </div>
</template>

<script>
export default {
  props: {
    classes: {
      type: String,
      default: 'bottom-5 right-2'
    }
  }
}
</script>