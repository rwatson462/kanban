

const xhrPostForm = (event) => {
   event.preventDefault()

   const form = event.target
   const formData = new FormData(form)
   
   // todo extra this to a re-usable function
   const request = new XMLHttpRequest()
   request.addEventListener('load',  (event) => {
      const {target} = event
      const response = target.response
      
      // todo implement xhr loading of category/step lists
      // for now, just reload the page
      if(response.result && response.result === 'success') {
         location.reload()
         return
      }
   })
   request.open(form.method, form.action)
   request.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
   request.responseType = 'json'
   request.send(formData)

   // make sure form doesn't actually post
   return false
}


(() => {
   // attach hooks to ajax-enabled form submit buttons
   const forms = document.querySelectorAll('form[data-use-ajax="1"]')
   forms.forEach( form => {
      form.addEventListener('submit', xhrPostForm)
   });
})()