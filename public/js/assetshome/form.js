(function(){
    // Opt-in to Bootstrap functionality
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    // Create variables
    var optionsList = document.getElementById('reason-list'),
        allTargets = $('.option-target'),
        currentOption,
        currentTarget;
    // Create Hide and Show Functionality
    function hideShowTargets(){
      allTargets.each(function(){
        this.classList.add('hidden');
      });
      currentOption = optionsList.value;
      currentTarget = document.getElementById(currentOption);
      if(currentTarget){
        currentTarget.classList.remove('hidden');
      }
    }
    // Add event listener
    optionsList.addEventListener('change', hideShowTargets);
  })();