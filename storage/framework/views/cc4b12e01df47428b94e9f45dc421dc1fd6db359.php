<script src="<?php echo e(JS); ?>ngStorage.js"></script>
<script src="<?php echo e(JS); ?>angular-messages.js"></script>


<script >
  var app = angular.module('academia', ['ngMessages']);
</script>

<?php echo $__env->make('common.angular-factory',array('load_module'=> FALSE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script>
app.controller('prepareUserData', function( $scope, $http, httpPreConfig) {


        
      $scope.getStates = function(selected_country) {

        route = '<?php echo e(URL_GET_STATES); ?>',
        data= {_method: 'post',
                 '_token':httpPreConfig.getToken(),
                   'id': selected_country
                 };

          $scope.states =[];

          httpPreConfig.webServiceCallPost(route, data).then(function(result){

          $scope.states    = result.data.states;
          });
      }


       $scope.getCities = function(selected_state) {

        route = '<?php echo e(URL_GET_CITIES); ?>',
        data= {_method: 'post',
                 '_token':httpPreConfig.getToken(),
                   'id': selected_state
                 };

          $scope.cities =[];

          httpPreConfig.webServiceCallPost(route, data).then(function(result){

          $scope.cities    = result.data.cities;
          });
      }

     
   
        $scope.initFunctions = function() 
        {
           <?php if (isset($record->country_id) && $record->country_id!='') {?>
                $scope.getStates(<?php echo e($record->country_id); ?>);
           <?php } ?>

           <?php if (isset($record->state_id) && $record->state_id!='') {?>
                $scope.getCities(<?php echo e($record->state_id); ?>);
           <?php } ?>
        }
      
});


</script>