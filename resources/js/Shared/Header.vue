<template>
  <div class="fixed top-0 w-full bg-dark-green">
    <div class="flex items-center justify-between py-2 responsive-container">
      <Link 
        v-for="(link, index) in links"
        :key="index"
        :class="{'active': $page.url === '/' && link.text === 'Home' ? true : $page.url === `/${link.route || link.routeName}`}"
        class="text-xs font-semibold text-white sm:text-xl"
        :href="route(link.routeName)"
      >
      {{ link.text }}
      </Link>
      <BreezeDropdown align="right" width="48">
        <template #trigger>
          <img :src="$page.props.auth?.user?.avatar" class="object-cover object-center w-8 h-8 rounded-full sm:h-14 sm:w-14" :class="{'border-4 rounded-full border-yellow': $page.url === '/profile'}" />
        </template>

        <template #content>
          <BreezeDropdownLink :href="route('profile')">
            Your Profile
          </BreezeDropdownLink>
          <button class="block w-full px-2 py-1 text-xs font-bold leading-5 text-center text-gray-700 transition duration-150 ease-in-out sm:text-sm sm:px-4 sm:py-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" @click.prevent="openModal">
            Delete Account
          </button>
          <BreezeDropdownLink :href="route('logout')" method="post" as="button">
            Log Out
          </BreezeDropdownLink>
        </template>
      </BreezeDropdown>
    </div>

    <!-- Delete Account Confirmation Modal -->
  <BreezeDialogModal :show="confirmingUserDeletion" @close="closeModal">
    <template #title>
        Are You Sure?
    </template>

    <template #content>
        Are you sure you want to delete your account?
    </template>

    <template #footer>
        <button class="font-semibold button-sm text-yellow" @click="closeModal">
            Cancel
        </button>

        <BreezeButton class="ml-2 button button-sm button-orange" @click="deleteUser">
            Delete
        </BreezeButton>
    </template>
  </BreezeDialogModal>
  
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeDialogModal from '@/Components/DialogModal.vue'
import BreezeButton from '@/Components/Button.vue'
export default {
  components: {
    Link,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeDialogModal,
    BreezeButton
  },
  data() {
    return {
      links: [
        {text: 'Home', routeName: 'index'},
        // {text: 'Recipes', routeName: 'recipes'},
        {text: 'Characters', routeName: 'characters'},
        {text: 'For Grown Ups', routeName: 'adults', route: 'for-grown-ups'},
      ],
      confirmingUserDeletion: false
    }
  },
  methods: {
    openModal() {
      this.confirmingUserDeletion = true
    },
    closeModal() {
      this.confirmingUserDeletion = false
    },
    deleteUser() {
      Inertia.delete(this.route('profile.delete'));
    }
  }
}
</script>