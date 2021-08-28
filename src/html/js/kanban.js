

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
   // make sure form doesn't actually post itself
   event.preventDefault()

   const form = event.target
   const formData = new FormData(form)
   
   xhr(form.action, form.method, formData, 'json', (event) => {
      const {target} = event
      const response = target.response
      
      if(response.result && response.result === 'success') {
         // if form has a linked dynamic content linked, refresh that
         if(form.dataset.dynamicElement) {
            let element = document.getElementById(form.dataset.dynamicElement)
            loadDynamicContent(element)
         }

         form.reset()
         return
      }
   })

   // make sure form doesn't actually post itself
   return false
}


const setupFormEventListeners = () => {
   const forms = document.querySelectorAll('form[data-use-ajax="1"]')
   forms.forEach( form => {
      form.addEventListener('submit', xhrPostForm)
   })
}

const loadDynamicContentElements = () => {
   const dynamicSections = document.querySelectorAll('section[data-source]');
   dynamicSections.forEach( section => {
      loadDynamicContent(section)
   })
}

addEventListener('DOMContentLoaded', () => {
   // attach hooks to ajax-enabled form submit buttons
   setupFormEventListeners()

   // dynamically load in requested content
   loadDynamicContentElements()
})