$("#branchFilter").on("change", function () {
  var selectedBranch = $(this).val();

  if (selectedBranch === "all") {
    $(".spa-row").fadeIn(200);
  } else {
    $(".spa-row").each(function () {
      var rowBranch = $(this).data("branch");
      if (rowBranch === selectedBranch) {
        $(this).fadeIn(200);
      } else {
        $(this).fadeOut(200);
      }
    });
  }
});
