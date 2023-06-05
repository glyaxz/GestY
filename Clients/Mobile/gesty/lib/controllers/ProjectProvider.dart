import 'package:gesty/models/Project.dart';
import 'package:gesty/services/project_api_service.dart';
import 'package:get/get.dart';

class ProjectProvider extends GetxController {
  //Es el punto medio entre el consumer y el servicio, el cual recoge del servicio y parsea la información
  late int companyId;
  bool _loading = false;
  static int columns = 2;
  bool get loading => _loading;
  final RxList<Project> _projects = <Project>[].obs;
  List<Project> get projects => _projects;

  void init() {
    // companyId = companyid;
    onInit();
  }

  @override
  void onInit() {
    // getProjects(companyId);
    super.onInit();
  }

  void changeLoading(bool newState) {
    _loading = newState;
    update();
  }

  void setCompanyId(int id) {
    companyId = id;
  }

  void setProjects(List<Project> newList) {
    _projects.clear();
    _projects.addAll(newList);
    update();
  }

  Future<void> getProjects(companyId) async {
    changeLoading(true);
    List<Project> aux =
        await ProjectApiService.getProjects(int.parse(companyId.toString()));
    setProjects(aux);
    changeLoading(false);
    print("DEBUG -> " + loading.toString());
    update();
  }
}
