// module.js
angular.module('ipvtran', [
  'ui.mask',
  'ui.bootstrap',
  'ipvtran.config'
]);

angular.module('ipvtran').config(['$compileProvider', '$sceProvider', function($compileProvider, $sceProvider) {
  $compileProvider.debugInfoEnabled(false);
  $sceProvider.enabled(false);
}]);

// directives.js

// factories.js

// controllers.js
angular.module('ipvtran').controller('HomeCtrl', HomeCtrl);
angular.module('ipvtran').controller('ContatoCtrl', ContatoCtrl);
angular.module('ipvtran').controller('InscricaoCtrl', InscricaoCtrl);
angular.module('ipvtran').controller('ModalInstanceCtrl', ModalInstanceCtrl);
angular.module('ipvtran').controller('CertificadoCtrl', CertificadoCtrl);
angular.module('ipvtran').controller('NewsletterCtrl', NewsletterCtrl);

NewsletterCtrl.$inject = ['$scope', '$http', 'apiURL'];
CertificadoCtrl.$inject = ['$scope', '$http', 'apiURL'];
ModalInstanceCtrl.$inject = ['$scope', '$uibModalInstance'];
HomeCtrl.$inject = ['$scope', '$http', 'apiURL', '$uibModal'];
ContatoCtrl.$inject = ['$scope', '$http', 'apiURL'];
InscricaoCtrl.$inject = ['$scope', '$http', 'apiURL'];

function NewsletterCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submit = function(user) {

    // waiting alert
    $scope.alerts.push({ type: 'warning', msg: 'Enviando...' });

    // AJAX
    var ajaxURL = apiURL + 'emails/api';

    $http.post(ajaxURL, { user: user }).then(function(result) {
      $scope.alerts.push({ type: 'success', msg: 'Obrigado, ' + user.name + '! O seu e-mail foi cadastrado com sucesso. Em breve você receberá novidades no seu e-mail.' });
    }).catch(function(error) {
      console.log(error);
      $scope.alerts.push({ type: 'danger', msg: 'Ocorreu um problema ao cadastrar o seu e-mail. Ele pode estar em uso. Entre em contato com o Instituto.' });
    });

    // reset form
    $scope.user = {};
    $scope.newsletterForm.$setPristine();
  }

}

function CertificadoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];
  $scope.candidate = false;

  $scope.submit = function(candidate) {

    // waiting alert
    $scope.alerts.push({ type: 'warning', msg: 'Enviando...' });

    // AJAX
    var ajaxURL = apiURL + 'candidates/api/search';

    $http.post(ajaxURL, candidate).then(function(result) {
      $scope.candidate = result.data.candidate;
      $scope.alerts.push({ type: 'success', msg: 'Sua inscrição foi identificada com sucesso! Verifique os dados abaixo:' });
    }).catch(function(error) {
      console.log(error);
      $scope.alerts.push({ type: 'danger', msg: 'Ocorreu um problema na consulta. Entre em contato com o Instituto.' });
    });

    // reset form
    $scope.consultaForm.$setPristine();
  }

}

function ModalInstanceCtrl($scope, $uibModalInstance) {
  $scope.cancel = function() {
    $uibModalInstance.dismiss('cancel');
  };
};

function HomeCtrl($scope, $http, apiURL, $uibModal) {

  $scope.open = function(size, template) {

    var modalInstance = $uibModal.open({
      animation: true,
      templateUrl: template,
      controller: 'ModalInstanceCtrl',
      size: size
    });

  };

}

function InscricaoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submitForm = function(record) {

    // waiting alert
    $scope.alerts.push({ type: 'warning', msg: 'Enviando...' });

    // AJAX
    $http.post(apiURL + 'candidates/api', {user: record}).then(function(result) {
      $scope.record = result.data;

      // reset model
      $scope.inscricao = { concluido: true };

      $scope.alerts.push({ type: 'success', msg: 'Inscrição Aprovada! Efetue o pagamento no PayPal.' });
    }).catch(function(error) {
      $scope.alerts.push({ type: 'danger', msg: error });
    });

    // reset form
    $scope.inscricaoForm.$setPristine();
  }
}

function ContatoCtrl($scope, $http, apiURL) {
  $scope.alerts = [];

  $scope.submitForm = function(contact) {

    // waiting alert
    $scope.alerts.push({ type: 'warning', msg: 'Enviando...' });

    $http.post(apiURL + 'emails/api/contact', { user: contact }).then(function(result) {
      $scope.alerts.push({ type: 'success', msg: 'Seu contato foi enviado com sucesso!' });
    }).catch(function(error) {
      $scope.alerts.push({ type: 'danger', msg: 'Ocorreu um problema ao enviar o seu contato. Tente novamente mais tarde.' });
    });

    // reset form and model
    $scope.contact = {};
    $scope.contactForm.$setPristine();
  }
}