<script src="<?php echo e(JS); ?>ngStorage.js"></script>
<script src="<?php echo e(JS); ?>angular-messages.js"></script>

<script >
  var app = angular.module('academia', ['ngMessages']);
</script>

<?php echo $__env->make('common.angular-factory',array('load_module'=> FALSE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script>

 
app.controller('prepareCitiesData', function ($scope, $http, httpPreConfig)
{

     $scope.states = []; 

     $scope.getStates = function (country_id) {

      route   = '<?php echo e(URL_GET_STATES); ?>';
      data    = {   _method: 'post', 
                    '_token':httpPreConfig.getToken(), 
                    'id':country_id 
                };
                   
          httpPreConfig.webServiceCallPost(route, data).then(function(result){

            $scope.states =[];
            
            $scope.states = result.data.states;
            
            });
    }


    $scope.initFunctions = function() 
    {
      <?php if (isset($record->country_id) && $record->country_id!='') {?>
       
      $scope.getStates(<?php echo e($record->country_id); ?>);

      <?php } ?>
    }


});
 
  
</script>