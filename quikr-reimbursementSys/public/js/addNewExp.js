console.log("Connected check");
//  var date = document.querySelectorAll(".expense_date");

const _MS_PER_DAY = 1000 * 60 * 60 * 24;

//Calculate Days
function dateDiffInDays(a, b) {
  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}
// Date validation
$("table").on("change" ,".expense_date" ,(e)=>{
        let str_date = e.target.value;
        let dte = new Date(str_date);
        let tday = new Date();
        let diff = dateDiffInDays(dte, tday);
        console.log(dte.getDate() , tday.getMonth());
        console.log("diff date " , diff);
        if(diff < 0 || diff > 60) {
            if(diff > 60)
              alert("Please enter the valid date ,you can only enter 60 days old expense");
            else alert("Please enter the valid date ");  
        }
});

