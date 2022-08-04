<template>
  <Transition name="AddExperienceModal">
    <div v-if="show" class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <div class="text-center text-4xl mb-12">Add work experience</div>
          <form v-on:submit.prevent="addExperience" class="w-full" ref="addExperience">
            <div class="flex flex-wrap">
              <div class="w-full md:w-1/2 px-3">
                <TextInput v-model="job_title" id="job-title" label="Job title" placeholder="Your job title" :error="this.errors.job_title ? this.errors.job_title[0] : ''"/>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <TextInput v-model="company_name" id="company-name" label="Company name" placeholder="Your company name" :error="this.errors.company_name ? this.errors.company_name[0] : ''"/>
              </div>
              <div class="w-full px-3">
                <TextInput v-model="company_web_url" id="company-web-url" label="Company web url" placeholder="Your company web url" :error="this.errors.company_web_url ? this.errors.company_web_url[0] : ''"/>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <TextInput v-model="city" id="city" label="City" placeholder="Your city" :error="this.errors.city ? this.errors.city[0] : ''"/>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <TextInput v-model="country" id="country" label="Country" placeholder="Your country" :error="this.errors.country ? this.errors.country[0] : ''"/>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <DatePickerInput id="start-date" label="Start date" :error="this.errors.start_date ? this.errors.start_date[0] : ''">
                  <date-picker
                    id="start-date"
                    format="yyyy-MM-dd"
                    :input-class="this.errors.start_date ? 'appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg border-red-600' : 'appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg'"
                    v-model="start_date"/>
                </DatePickerInput>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <DatePickerInput id="end-date" label="End date" :error="this.errors.end_date ? this.errors.end_date[0] : ''">
                  <date-picker
                    id="end-date"
                    format="yyyy-MM-dd"
                    :input-class="this.errors.end_date ? 'appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg border-red-600' : 'appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg'"
                    v-model="end_date"/>
                </DatePickerInput>
              </div>
              <div class="w-full px-3">
                <TextArea v-model="responsibilities" id="responsibilities" label="Responsibilities" placeholder="Your responsibilities" :error="this.errors.responsibilities ? this.errors.responsibilities[0] : ''"/>
              </div>
              <div class="w-full md:w-1/2 px-3 mt-2">
                <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-8 rounded-lg">
                  Add
                </button>
              </div>
              <div class="w-full md:w-1/2 px-3 mt-2">
                <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-4 px-8 rounded-lg" @click="$emit('close')">
                  Close
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Transition>
</template>
<script>
import TextInput from '@/components/forms/TextInput.vue';
import TextArea from '@/components/forms/TextArea.vue';
import DatePickerInput from '@/components/forms/DatePickerInput.vue';
export default {
  components: {
    TextInput,
    TextArea,
    DatePickerInput,
  },
  props: {
    show: Boolean,
  },
  data () {
    return {
      errors: [],
      job_title: '',
      responsibilities: '',
      company_name: '',
      company_web_url: '',
      city: '',
      country: '',
      start_date: '',
      end_date: '',
    }
  },
  methods: {
    addExperience () {
      this.$axios.post('experiences', {
        job_title: this.job_title,
        responsibilities: this.responsibilities,
        company_name: this.company_name,
        company_web_url: this.company_web_url,
        city: this.city,
        country: this.country,
        start_date: this.start_date,
        end_date: this.end_date,
      }).then((response) => {
        this.$parent.experiences.push(response.data.data)
        this.resetForm()
        this.$emit('close')
      }).catch((error) => {
        this.errors = error.response.data.errors
      })
    },
    resetForm () {
      this.errors = []
      this.job_title = ''
      this.responsibilities = ''
      this.company_name = ''
      this.company_web_url = ''
      this.city = ''
      this.country = ''
      this.start_date = ''
      this.end_date = ''
    },
  },
}
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 800px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
