import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";
import { toast } from "vue-sonner";


export const useAuthController = defineStore('useauthcontroller', () => {

    const email_address = ref<string|null>(null);
    const message = ref<string|null>(null);
    const password = ref<string|null>(null);
    const emailsenderloader = ref<boolean>(false);
    const errors = ref<{}>({});



    const formattedDate = (rawDate:Date) => {
        if (!rawDate) return ''
    
        const date = new Date(rawDate)
        const day = String(date.getDate()).padStart(2, '0')
        const month = String(date.getMonth() + 1).padStart(2, '0')
        const year = date.getFullYear()
    
        return `${day}/${month}/${year}`
      }

      const formattedDateInString = (rawDate:Date) => {
        if (!rawDate) return ''
    
        const date = new Date(rawDate)
        const day = String(date.getDate()).padStart(2, '0')
        const month = date.toLocaleDateString('en-US', {month: 'short'});
        const year = date.getFullYear()
    
        return `${month} ${day}, ${year}`
      }

      const formattedDateWithTime = (rawDate: string) => {
        if (!rawDate) return ''
      
        const date = new Date(rawDate)
      
        const day = date.getDate()
        const month = date.toLocaleString('en-US', { month: 'long' })
        const year = date.getFullYear()
      
        const hours = date.getHours()
        const minutes = String(date.getMinutes()).padStart(2, '0')
      
        const ampm = hours >= 12 ? 'PM' : 'AM'
        const formattedHour = hours % 12 || 12
      
        return `${day} ${month}, ${year} | ${formattedHour}:${minutes}${ampm}`
      }
      


    const EmailSender = async (_csrf: any) => {
        console.log('started');
        
        if(emailsenderloader.value) return null;
        try{
            errors.value = {};
            emailsenderloader.value = true;
            const url = '/web_api/v1/send-message';

            const payload = {
                email: email_address.value,
                message: message.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                 email_address.value = '';
                return toast.success(response.data.message);
            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            emailsenderloader.value = false;
        }
    }


    const bookingloader = ref<boolean>(false);


    const services = ref<string|null>(null);
    const fullname = ref<string|null>(null);
    const phone_number = ref<string|null>(null);
    const date = ref<string|null>(null);

    const clearData = () => {
        services.value = "";
        fullname.value = "";
        phone_number.value = "";
        date.value = "";
        email_address.value = "";
    }
    
    const BookingSender = async (_csrf: any) => {
        console.log('started');
        
        if(bookingloader.value) return null;
        try{
            errors.value = {};
            bookingloader.value = true;
            const url = '/web_api/v1/booking-message';

            const payload = {
                email_address: email_address.value,
                services: services.value,
                fullname: fullname.value,
                phone_number: phone_number.value,
                date: date.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                return toast.success(response.data.message);
            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            bookingloader.value = false;
        }
    }

    const loginloader = ref<boolean>(false);
    const LoginCreation = async (_csrf: any) => {
        if(loginloader.value) return null;
        try{
            errors.value = {};
            loginloader.value = true;
            const url = '/web_api/v1/back-end-api/login';

            const payload = {
                email: email_address.value,
                password: password.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                 toast.success(response.data.message);
                 return setTimeout(() => {
                    window.location.href = '/jay-funds/dashboard/home'
                 },1000);

            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            loginloader.value = false;
        }
    }

    const shipment_lists = ref<[]>([]);
    const ShipmentHistory = async (csrf_token: any, params: { page?: number; per_page?: number; search?: string } = {}) => {
      try {
        const response = await axios.get('/web_api/v1/back-end-api/shipment-history', {
          params: { ...params },
          headers: { 'X-CSRF-TOKEN': csrf_token },
        });
 
        console.log('info log', response.data.data.data);
        shipment_lists.value = response.data.data.data;
        return response.data;
      } catch (error) {
        console.error('API error:', error);
        throw error;
      }
    };


    const title = ref<string|null>(null);
    const sender_name = ref<string|null>(null);
    const receiver_name = ref<string|null>(null);
    const origin = ref<string|null>(null);
    const destination = ref<string|null>(null);
    const delivery = ref<string|null>(null);

    const shipmentloader = ref<boolean>(false);
    const CreateShipment = async (_csrf: any) => {
        if(loginloader.value) return null;
        try{
            errors.value = {};
            shipmentloader.value = true;
            const url = '/web_api/v1/back-end-api/create-shipment';

            const payload = {
                title: title.value,
                sender_name: sender_name.value,
                receiver_name: receiver_name.value,
                origin: origin.value,
                destination: destination.value,
                expected_delivery:delivery.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                toast.success(response.data.message);
                return setTimeout(() => {
                    window.location.href = '';
                }, 1000);

            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            shipmentloader.value = false;
        }
    }

    const status_report = ref<string|null>(null);
    const description = ref<string|null>(null);
    const nextstop = ref<string|null>(null);
    const location = ref<string|null>(null);


    const updateshipmentloader = ref<boolean>(false);
    const UpdateShipment = async (_csrf: any, reference: any) => {
        if(updateshipmentloader.value) return null;
        try{
            errors.value = {};
            updateshipmentloader.value = true;
            const url = '/web_api/v1/back-end-api/update-location';

            const payload = {
                reference: reference,
                status: status_report.value,
                description: description.value,
                location: location.value,
                nextstop: nextstop.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                toast.success(response.data.message);
                return setTimeout(() => {
                    window.location.href = '';
                }, 1000);

            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            updateshipmentloader.value = false;
        }
    }



    const deleteshipmentloader = ref<boolean>(false);
    const DeleteShipment = async (_csrf: any, id: any) => {
        if(deleteshipmentloader.value) return null;
        try{
            errors.value = {};
            deleteshipmentloader.value = true;
            const url = '/web_api/v1/back-end-api/delete-shipment';

            const payload = {
                reference: id,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                toast.success(response.data.message);
                return setTimeout(() => {
                    window.location.href = '';
                }, 1000);

            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            deleteshipmentloader.value = false;
        }
    }


    const logoutloading = ref<boolean>(false);
    const LogOut = async (_csrf: any) => {
        if(logoutloading.value) return null;
        try{
            errors.value = {};
            logoutloading.value = true;
            const url = '/web_api/v1/back-end-api/logout';


            const response = await axios.post(url, {}, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                toast.success(response.data.message);
                return setTimeout(() => {
                    window.location.href = '';
                }, 1000);

            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            logoutloading.value = false;
        }
    }


    const trackingloader = ref<boolean>(false);
    const trackingid = ref<string|null>(null);

    const TrackingID = async (_csrf: any) => {
        if(trackingloader.value) return null;
        try{
            errors.value = {};
            trackingloader.value = true;
            const url = '/web_api/v1/back-end-api/tracking-id';

            const payload = {
                tracking_code: trackingid.value,
            }

            const response = await axios.post(url, payload, {
                headers:{ 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _csrf,
                }
            });

            if(response.status == 200 && response.data.status == 'success'){
                clearData();
                toast.success(response.data.message);
                const reference = response.data.data;
                return setTimeout(() => {
                    window.location.href = `/c/tracking-location/${reference}`;
                }, 1000);
            }
            return toast.error(response.data.message);
        }   

        catch(error: any){
            if(error.response.status == 422){
                errors.value = error.response.data.errors;
            }
        }

        finally{
            trackingloader.value = false;
        }
    }




    return {
        nextstop,
        trackingid,
        LogOut,
        logoutloading,
        status_report,
        description,
        location,
        deleteshipmentloader,
        DeleteShipment,
        UpdateShipment,
        updateshipmentloader,
        formattedDate,
        formattedDateInString,
        formattedDateWithTime,
        delivery,
        title,
        sender_name,
        receiver_name,
        origin,
        destination,
        shipmentloader,
        CreateShipment,
        shipment_lists,
        ShipmentHistory,
        password,
        loginloader,
        LoginCreation,
        TrackingID,
        trackingloader,
        services,
        fullname,
        phone_number,
        date,
        BookingSender,
        bookingloader,
        email_address,
        message,
        errors,
        EmailSender,
        emailsenderloader,
    }

} )


