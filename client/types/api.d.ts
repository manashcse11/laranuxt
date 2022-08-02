
export interface MetApiResponse {
  benchmark: number
  status: 'success' | 'failure'
  query: {
    options: Record<string, any>
    params: Record<string, any>
  }
  paginate?: {
    current_page: number
    first_item: number
    last_item: number
    last_page: number
    pages: Array<number>
    per_page: number
    total: number
  }
  data: any
}

export interface User {
  name: string
  job: string
  email: string
  phone: string
  avatar: string
}

export type Users = Array<User>

export interface Experience {
  job_title: string
  company_name: string
  company_web_url: string
  city: string
  country: string
  start_date: string
  end_date: string
  responsibilities: string
}

export type Experiences = Array<Experience>
