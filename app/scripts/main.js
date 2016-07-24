// module.js
angular.module('ipvtran', [
  'ui.mask',
  'ui.bootstrap'
]);

angular.module('ipvtran').config(['$compileProvider', function ($compileProvider) {
    // $compileProvider.debugInfoEnabled(false);
}]);

// directives.js

// factories.js

// controllers.js
angular.module('ipvtran').controller('ContatoCtrl', ContatoCtrl);

ContatoCtrl.$inject = ['$scope'];

function ContatoCtrl($scope) {
  $scope.alerts = [];

  $scope.submitForm = function(contact) {
    $scope.alerts.push({type: 'success', msg: 'Seu contato foi enviado com sucesso!'});
    
    $scope.contact = {};

    $scope.contactForm.$setPristine();
  }
}