
<!-- JavaScript -->
<script src="/assets/js/bundle.js?ver=2.9.1"></script>
<script src="/assets/js/scripts.js?ver=2.9.1"></script>
<script src="/assets/js/charts/gd-default.js?ver=2.9.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ mix('js/app.js') }}"></script>

<script>
    /*
    # Bric Mohammed reda
    # script for Axios  Get/Post/Put/Delete Request
    # use toastr
    ## https://github.com/CodeSeven/toastr
 */

    const instance = axios.create({
        baseURL: "",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN":  document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    });

    function store(url,form) {

        instance.post(url, getForm(form))
            .then(function (response) {
                // handle success
                NioApp.Toast(response.data['message'], 'success');
                console.log(response);
            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });
    }

    function edit(url) {
        instance.get(url)
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });
    }

    function update(url,form) {
        instance.put(url, getForm(form))
            .then(function (response) {
                // handle success
                NioApp.Toast(response.data['message'], 'success');
                setTimeout(function () {
                    // redirectTo show page
                    location.reload()

                }, 5000);
            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });
    }

    function updateInvoice(url,form) {


        fetch(url, {method:'post', body: new FormData(document.getElementById(form))})
            .then((response) => response.json())
            .then(function (response) {
                // handle success
                NioApp.Toast(response.data['message'], 'success');
                setTimeout(function () {
                    // redirectTo show page
                    location.replace(response.redirectTo)

                }, 5000);
            }).catch(function (error) {
            //show toastr error message
            NioApp.Toast(error.message, 'error');
            // handle error
            console.log(error.message);
        });
    }

    function destroy(url) {
        instance.delete(url)
            .then(function (response) {
                // handle success
                NioApp.Toast(response.data['message'], 'success');
            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });

    }

    function show() {
        instance.get(url)
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });

    }

    function getForm(form) {


        let myForm = document.getElementById(form);
        let formData = new FormData(myForm);
        const data = {};
        // need to convert it before using not with XMLHttpRequest
        for (let [key, val] of formData.entries()) {

            Object.assign(data, {[key]: val})

        }

        return data;
    }

    function getFormWitheArray(form) {

        let myForm = document.getElementById(form);
        let formData = new FormData(myForm);
        let bodyFormData = [];
        // need to convert it before using not with XMLHttpRequest
        for (let [key, val] of formData.entries()) {

            bodyFormData[key] = val;

        }

        return bodyFormData;

    }

    function compareCurrentDate(date)

    {
        let CurrentDate = new Date();
        let GivenDate = new Date(date);
        if(CurrentDate.toDateString() == GivenDate.toDateString())	return "Aujourd'hui";
        GivenDate.setDate(GivenDate.getDate()+1);
        if(CurrentDate.toDateString() == GivenDate.toDateString())	return "Hier";
        return dateFormatFr(date);
    }
    function dateFormatFr(date)
    {
        date = new Date(date);
        return ("0"+date.getDate()).slice(-2)+"/"+("0"+(date.getMonth()+1)).slice(-2)+"/"+date.getFullYear();
    }

    function numberFormat(number) {
        return parseFloat(number).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }





</script>
@yield('javascript')
