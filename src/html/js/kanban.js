

const xhr = (url, method = 'GET', data = undefined, responseType = 'json', onload = undefined) => {

   const request = new XMLHttpRequest()
   if(onload) request.addEventListener('load', onload)
   request.open(method, url)
   request.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
   request.responseType = responseType
   request.send(data)
}


const loadDynamicContent = (element) => {
   const url = element.dataset.source
   xhr(url, 'GET', undefined, 'text', (event) => {
      const {target} = event
      element.innerHTML = target.responseText
   })
}


const xhrPostForm = (event) => {
   event.preventDefault()

   const form = event.target
   const formData = new FormData(form)
   
   // todo extra this to a re-usable function
   xhr(form.action, form.method, formData, 'json', (event) => {
      const {target} = event
      const response = target.response
      
      // todo implement xhr loading of category/step lists
      // for now, just reload the page
      if(response.result && response.result === 'success') {
         location.reload()
         return
      }
   })

   // make sure form doesn't actually post
   return false
}


(() => {
   // attach hooks to ajax-enabled form submit buttons
   const forms = document.querySelectorAll('form[data-use-ajax="1"]')
   forms.forEach( form => {
      form.addEventListener('submit', xhrPostForm)
   })

   const dynamicSections = document.querySelectorAll('section[data-source]');
   dynamicSections.forEach( section => {
      loadDynamicContent(section)
   })
})()