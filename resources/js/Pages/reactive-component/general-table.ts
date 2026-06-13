import axios from "axios";
import { defineStore } from "pinia";
import { computed, ref, watch } from 'vue';

export const useGeneralTable = defineStore('useGeneralTable', () => {
  const isLoading = ref(false);
  const newcategory = ref('');
  const searchQuery = ref('');
  const tabselect = ref('');
  const querytabselect = ref('');
  const rowsPerPage = ref(5);
  const currentPage = ref(1);
  const dropOption = ref([5, 20, 100, 500]);



    const serverData = ref({
    data: [],
    current_page: 1,
    last_page: 1,
    total: 0,
    per_page: 15, 
  });

  const categoryclasseslist = ref<[]>([]); 
  const reviewPagination = computed(() => serverData.value.data);
  const totalPages = computed(() => serverData.value.last_page);
  const noResults = computed(() => serverData.value.data.length === 0);


  const nextPage = () => {
    if (currentPage.value < totalPages.value) {
      currentPage.value++;
    }
  };

  const prevPage = () => {
    if (currentPage.value > 1) {
      currentPage.value--;
    }
  };

  const changeValueState = () => {
    currentPage.value = 1;
  };

  const fetchData = async (fetchCallback: () => Promise<any>) => {
    isLoading.value = true;
    try {
      const response = await fetchCallback();  
      console.log('[fetchData] full response:', response);
  
      const paginator = response?.data ?? {};

      serverData.value = {
        data: paginator.data || [],                 
        current_page: paginator.current_page ?? 1,
        last_page: paginator.last_page ?? 1,
        total: paginator.total ?? 0,
        per_page: paginator.per_page ?? rowsPerPage.value,
      };

      currentPage.value = serverData.value.current_page;
      rowsPerPage.value = serverData.value.per_page;
  
    } catch (error) {
      console.error('[fetchData] error:', error);
    } finally {
      isLoading.value = false;
    }
  };

  function resetTable() {
    currentPage.value = 1
    searchQuery.value = ''
    tabselect.value = ''
    querytabselect.value = ''
  
    serverData.value = {
      data: [],
      current_page: 1,
      last_page: 1,
      total: 0,
      per_page: rowsPerPage.value,
    }
  }
  

  

  return {
    resetTable,
    categoryclasseslist,
    querytabselect,
    isLoading,
    newcategory,
    serverData,
    searchQuery,
    tabselect,
    rowsPerPage,
    dropOption,
    currentPage,
    reviewPagination,
    noResults,
    totalPages,
    nextPage,
    prevPage,
    changeValueState,
    fetchData,
  };
});