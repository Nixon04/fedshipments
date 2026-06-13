import { defineStore } from "pinia";
import { ref } from "vue";

export const useToggleBurger = defineStore('useToggleburger', () => {
    const toggle_active = ref<boolean>(false);
    const testimonialSlider = ref<HTMLElement | null>(null)
    const testimonialSliders = ref<HTMLElement | null>(null)

    const updateToggle = () => {
        toggle_active.value =! toggle_active.value;
        console.log('Log information', toggle_active.value);   
    }


    const cancelToggle = () => {
        toggle_active.value = false;
    }


    const ScrollTestimonials = (direction: 'left' | 'right') => {
        console.log('Log Information', direction);
        
        if(!testimonialSlider.value) return
    
        const scrollAmount = 400
        if(direction === 'left'){
            testimonialSlider.value.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            })
        }
    
        else{
            testimonialSlider.value.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            })
        }
    }


    const ScrollTestimonialsX = (direction: 'left' | 'right') => {
        console.log('Log Information', direction);
        
        if(!testimonialSliders.value) return
    
        const scrollAmount = 400
        if(direction === 'left'){
            testimonialSliders.value.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            })
        }
    
        else{
            testimonialSliders.value.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            })
        }
    }
    const faqtoggleindex = ref<number|null>(null);
    const FaqToggle = (item:number) => {
        if(faqtoggleindex.value === item){
            faqtoggleindex.value = null;
          }
          else{
            faqtoggleindex.value = item;
          }
    }

    const navigationstatus = ref<boolean>(false);
    const ToggleNavigationHolder = () => {
      navigationstatus.value =! navigationstatus.value;
    }

    const indexchange = ref<boolean>(false); 
    const ToggleEventChange = () => {
        indexchange.value =! indexchange.value;    
    }
    
  

    return {
        indexchange,
        ToggleEventChange,
        navigationstatus,
        ToggleNavigationHolder,
        cancelToggle,
        faqtoggleindex,
        FaqToggle,
        testimonialSliders,
        ScrollTestimonialsX,
        testimonialSlider,
        ScrollTestimonials,
        toggle_active,
        updateToggle,
    }
    
});