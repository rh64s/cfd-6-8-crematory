import { defineStore } from 'pinia'
import axios from "axios";

export const useApiStore = defineStore('ApiStore', () => {
  const fetchDataApi = async () => {
    try {
      const { data } = await axios.get('http://localhost:80/api/services');

      return data.data;
    }
    catch (error) {
      console.log(error)
    }
  }

  return {
    fetchDataApi,
  }
})
