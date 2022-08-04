<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="m-8 flex items-center justify-center">
      <Logo />
    </div>
    <AddExperienceModal :show="showAddExperienceModal" @close="showAddExperienceModal = false"/>
    <EditExperienceModal :index="index" :experience="experience" :show="showEditExperienceModal" @close="showEditExperienceModal = false"/>
    <div class="w-full bg-white rounded-lg shadow p-8">
      <div class="flex justify-between border-b-2">
        <div class="w-full md:w-1/2">
          <h1 class="text-3xl font-bold w-full flex items-center justify-between p-6 space-x-6">Work Experience</h1>
        </div>
        <div class="w-full md:w-1/2 p-6 space-x-6 text-right">
          <button id="show-add-experience-modal" @click="showAddExperienceModal = true" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Add Experience
            </span>
          </button>
        </div>
      </div>
      <div v-for="(experience, index) in experiences" :key="index">
        <experience-card :key="index" :experience="experience" />
        <div class="w-full flex items-center justify-between p-6">
          <button @click="showEditExperienceModalMethod(index, experience)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Edit
          </button>
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import AddExperienceModal from '../components/modals/AddExperienceModal'
import EditExperienceModal from '../components/modals/EditExperienceModal'
import { Experiences } from '@/types/api'
export default Vue.extend({
  components: {
    AddExperienceModal,
    EditExperienceModal,
  },
  data () {
    const experiences:Experiences = []
    const count:number = 9

    return {
      experiences,
      count,
      showAddExperienceModal: false,
      showEditExperienceModal: false,
      experience: [],
      index: Number,
    }
  },
  mounted () {
    this.get(this.count)
    console.log('test')
  },
  methods: {
    async get (count: number): Promise<void> {
      await this.$sleep(2000)
      this.experiences = (
        await this.$axios.get('experiences', { params: { count } })
      ).data.data as Experiences
    },
    total (count: number): void {
      this.experiences = []
      this.count = count
      this.get(this.count)
    },
    showEditExperienceModalMethod (index, experience) {
      this.showEditExperienceModal = true
      this.index = index
      this.experience = experience
    },
  },
})
</script>
<style>
.text-block {
  white-space: pre;
}
</style>
