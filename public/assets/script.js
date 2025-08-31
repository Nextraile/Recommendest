// Main JavaScript file for the travel destination website

document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById("mobile-menu-button")
  const mobileMenu = document.getElementById("mobile-menu")

  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden")
    })
  }

  // Budget slider functionality
  const budgetSlider = document.getElementById("budget")
  const budgetValue = document.getElementById("budget-value")

  if (budgetSlider && budgetValue) {
    budgetSlider.addEventListener("input", function () {
      const value = Number.parseInt(this.value)
      budgetValue.textContent = formatCurrency(value)
    })
  }

  // Distance slider functionality
  const jarakSlider = document.getElementById("jarak")
  const jarakValue = document.getElementById("jarak-value")

  if (jarakSlider && jarakValue) {
    jarakSlider.addEventListener("input", function () {
      jarakValue.textContent = this.value
    })
  }

  // Radio button styling
  const radioButtons = document.querySelectorAll('input[type="radio"]')
  radioButtons.forEach((radio) => {
    radio.addEventListener("change", function () {
      // Remove active class from all labels
      document.querySelectorAll("label").forEach((label) => {
        label.classList.remove("border-primary", "bg-primary", "bg-opacity-10")
      })

      // Add active class to selected label
      if (this.checked) {
        const label = this.closest("label")
        if (label) {
          label.classList.add("border-primary", "bg-primary", "bg-opacity-10")
        }
      }
    })
  })

  // Form validation
  const forms = document.querySelectorAll("form")
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const requiredFields = form.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.classList.add("border-red-500")

          // Remove error styling after user starts typing
          field.addEventListener("input", function () {
            this.classList.remove("border-red-500")
          })
        } else {
          field.classList.remove("border-red-500")
        }
      })

      if (!isValid) {
        e.preventDefault()
        showNotification("Mohon lengkapi semua field yang wajib diisi", "error")
      }
    })
  })

  // Initialize tooltips and other interactive elements
  initializeInteractiveElements()
})

// Utility functions
function formatCurrency(amount) {
  return new Intl.NumberFormat("id-ID").format(amount)
}

function setAmount(amount) {
  const jumlahInput = document.getElementById("jumlah")
  if (jumlahInput) {
    jumlahInput.value = amount

    // Add visual feedback
    const buttons = document.querySelectorAll(".amount-btn")
    buttons.forEach((btn) => btn.classList.remove("bg-primary", "text-white"))

    event.target.classList.add("bg-primary", "text-white")
  }
}

function cancelBooking(bookingId) {
  if (confirm("Apakah Anda yakin ingin membatalkan booking ini?")) {
    // Show loading state
    const button = event.target
    const originalText = button.textContent
    button.innerHTML = '<span class="loading"></span> Membatalkan...'
    button.disabled = true

    // Simulate API call
    setTimeout(() => {
      showNotification("Booking berhasil dibatalkan", "success")

      // Redirect to history page
      setTimeout(() => {
        window.location.href = "riwayat-transaksi.php"
      }, 1500)
    }, 2000)
  }
}

function showNotification(message, type = "info") {
  // Create notification element
  const notification = document.createElement("div")
  notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 translate-x-full`

  // Set notification style based on type
  switch (type) {
    case "success":
      notification.classList.add("bg-green-500", "text-white")
      break
    case "error":
      notification.classList.add("bg-red-500", "text-white")
      break
    case "warning":
      notification.classList.add("bg-yellow-500", "text-white")
      break
    default:
      notification.classList.add("bg-blue-500", "text-white")
  }

  notification.innerHTML = `
        <div class="flex items-center justify-between">
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `

  document.body.appendChild(notification)

  // Animate in
  setTimeout(() => {
    notification.classList.remove("translate-x-full")
  }, 100)

  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.classList.add("translate-x-full")
    setTimeout(() => {
      if (notification.parentElement) {
        notification.remove()
      }
    }, 300)
  }, 5000)
}
// LOADING STATES HAMA, FORMNYA JADI GA KESUBMIT TELASO
function initializeInteractiveElements() {
//   // Add loading states to buttons
//   const submitButtons = document.querySelectorAll('button[type="submit"]')
//   submitButtons.forEach((button) => {
//     button.addEventListener("click", function () {
//       const form = this.closest("form")
//       if (form && form.checkValidity()) {
//         const originalText = this.textContent
//         this.innerHTML = '<span class="loading"></span> Memproses...'
//         this.disabled = true

//         // Re-enable after form submission (in case of validation errors)
//         setTimeout(() => {
//           this.textContent = originalText
//           this.disabled = false
//         }, 3000)
//       }
//     })
//   })
// LOADING STATES HAMA, FORMNYA JADI GA KESUBMIT TELASO

  // Add smooth scrolling to anchor links
  const anchorLinks = document.querySelectorAll('a[href^="#"]')
  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Add image lazy loading fallback
  const images = document.querySelectorAll("img")
  images.forEach((img) => {
    img.addEventListener("error", function () {
      if (!this.src.includes("placeholder.svg")) {
        const width = this.offsetWidth || 300
        const height = this.offsetHeight || 200
        const query = this.alt || "image"
        this.src = `/placeholder.svg?height=${height}&width=${width}&query=${encodeURIComponent(query)}`
      }
    })
  })
}

// Utility function for date formatting
function formatDate(dateString) {
  const options = {
    year: "numeric",
    month: "long",
    day: "numeric",
    timeZone: "Asia/Jakarta",
  }
  return new Date(dateString).toLocaleDateString("id-ID", options)
}

// Search functionality (if needed)
function searchDestinations(query) {
  const destinations = document.querySelectorAll(".destination-card")
  const searchTerm = query.toLowerCase()

  destinations.forEach((card) => {
    const title = card.querySelector("h3").textContent.toLowerCase()
    const description = card.querySelector("p")?.textContent.toLowerCase() || ""

    if (title.includes(searchTerm) || description.includes(searchTerm)) {
      card.style.display = "block"
    } else {
      card.style.display = "none"
    }
  })
}

// Export functions for global use
window.setAmount = setAmount
window.cancelBooking = cancelBooking
window.showNotification = showNotification
window.searchDestinations = searchDestinations
