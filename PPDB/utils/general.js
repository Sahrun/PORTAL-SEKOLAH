import swal from 'sweetalert';

// Function
export function genetateParam (filter) {
  var param ="";
  if(!isNUll(filter.page))
  {
    param = param.concat('page=',filter.page+"&")
  }
  if(!isNUll(filter.show)){
    param = param.concat('show=',filter.show+"&")
  }
  if(!isNUll(filter.search)){
    param = param.concat('search=',filter.search+"&")
  }
  if(!isNUll(filter.sort_by)){
    param = param.concat('order_by=',filter.sort_by+"&")
  }
  if(!isNUll(filter.order_by)){
    param = param.concat('order=',filter.order_by+"&")
  }
  
  return param;
}
export function isNUll(val){
  return (val == null || val == '' || val == undefined)? true : false;
}

// End


// Properties
export const show = [10,25,50,100]
export const orders = {asc:'asc',desc:'desc'}
export const default_filter =
            {
                order_by:'desc',
                sort_by:'created_at',
                show:10,
                page:1,
                search:'',
                count_data:0,
                count:0,
                pages:0
            }

// End



// Swal
export function swal_error(text="error",title="error",icon="error"){
  swal({
    title:title,
    text:text,
    icon: icon,
    dangerMode: true,
  });
}
export function  swal_success(title="success",icon="success"){
  swal({
    title:title,
    icon: icon,
  });
}
// End