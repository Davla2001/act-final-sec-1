function showContent(option) {
    // Oculta todos los contenidos de las secciones
    const contentSections = document.querySelectorAll('.content-section');
    contentSections.forEach(section => {
      section.style.display = 'none';
    });
  
    // Muestra el contenido de la opción seleccionada
    const selectedContent = document.getElementById(`content-${option}`);
    selectedContent.style.display = 'block';
  }