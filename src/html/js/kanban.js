

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
   xhr(
      url, 
      'GET', 
      undefined, // no need for data to be sent
      'text', 
      (event) => {
         const {target} = event
         element.innerHTML = target.responseText
      }
   )
}


const xhrPostForm = (form) => {
   const formData = new FormData(form)
   const action = form.getAttribute('action')
   const method = form.getAttribute('method')

   xhr(
      action,
      method,
      formData,
      'json', 
      (event) => {
         const {target} = event
         const response = target.response

         switch(target.status) {
            case 200:
               if(response.result && response.result === 'success') {
                  // if form has a linked dynamic content linked, refresh that
                  if(form.dataset.dynamicElement) {
                     let element = document.getElementById(form.dataset.dynamicElement)
                     loadDynamicContent(element)
                  }
            
                  form.reset()
                  return
               }
               break

            case 422:
               if(response.message) {
                  // todo put this in some fancy interface element
                  alert(response.message)
               }
               break
         }
      }
   )
}


const formSubmitHander = (event) => {
   const form = event.target

   // if this is a form that wants to post itself via ajax,
   // action that, otherwise just do nothing
   if(form.dataset.useAjax === "1") {
      xhrPostForm(form)
      event.preventDefault()
      return false
   }
}

const loadDynamicContentElements = () => {
   document.querySelectorAll('section[data-source]').forEach( section => {
      loadDynamicContent(section)
   })
}

addEventListener('DOMContentLoaded', () => {
   // attach hooks to ajax-enabled form submit buttons
   document.addEventListener('submit', formSubmitHander)

   // dynamically load in requested content
   loadDynamicContentElements()
})